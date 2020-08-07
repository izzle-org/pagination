<?php declare(strict_types=1);

namespace Izzle\Pagination;

use Izzle\Model\Model;
use Izzle\Model\PropertyCollection;
use Izzle\Model\PropertyInfo;

/**
 * Class Meta
 * @package Izzle\Pagination
 */
class Meta extends Model
{
    /**
     * @var int
     */
    protected int $offset = 0;
    
    /**
     * @var int
     */
    protected int $perPage = 100;
    
    /**
     * @var int
     */
    protected int $total = 0;
    
    /**
     * @var string|null
     */
    protected ?string $path = null;
    
    /**
     * @return int
     */
    public function getOffset(): int
    {
        return $this->offset;
    }
    
    /**
     * @param int $offset
     * @return $this
     */
    public function setOffset(int $offset): self
    {
        $this->offset = $offset;
        
        return $this;
    }
    
    /**
     * @return int
     */
    public function getCurrentPage(): int
    {
        return $this->perPage > 0 ? $this->offset / $this->perPage + 1 : 1;
    }
    
    /**
     * @param int $currentPage
     * @return $this
     */
    public function setCurrentPage(int $currentPage): self
    {
        $this->offset = ($currentPage - 1) * $this->perPage;
        
        return $this;
    }
    
    /**
     * @return int|null
     */
    public function getFrom(): ?int
    {
        return $this->getFirstItem();
    }
    
    /**
     * @return int
     */
    public function getLastPage(): int
    {
        return $this->perPage > 0 ? max((int) ceil($this->total / $this->perPage), 1) : 1;
    }
    
    /**
     * @return int
     */
    public function getPerPage(): int
    {
        return $this->perPage;
    }
    
    /**
     * @param int $perPage
     * @return $this
     */
    public function setPerPage(int $perPage): self
    {
        $this->perPage = $perPage;
        
        return $this;
    }
    
    /**
     * @return int|null
     */
    public function getTo(): ?int
    {
        return $this->getLastItem();
    }
    
    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }
    
    /**
     * @param int $total
     * @return $this
     */
    public function setTotal(int $total): self
    {
        $this->total = $total;
        
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getPath(): ?string
    {
        return $this->path;
    }
    
    /**
     * @param string|null $path
     * @return $this
     */
    public function setPath(?string $path): self
    {
        $this->path = $path;
        
        return $this;
    }
    
    /**
     * @return bool
     */
    public function hasPages(): bool
    {
        return $this->getCurrentPage() !== 1 || $this->hasMorePages();
    }
    
    /**
     * @return bool
     */
    public function onFirstPage(): bool
    {
        return $this->getCurrentPage() <= 1;
    }
    
    /**
     * @return bool
     */
    public function hasMorePages(): bool
    {
        return $this->getCurrentPage() < $this->getLastPage();
    }
    
    /**
     * @return int
     */
    public function countOnPage(): int
    {
        if ($this->hasMorePages()) {
            return $this->perPage;
        }
        
        return $this->total - ($this->getCurrentPage() - 1) * $this->perPage;
    }
    
    /**
     * @return int|null
     */
    protected function getFirstItem(): ?int
    {
        return $this->total > 0 ? ($this->getCurrentPage() - 1) * $this->perPage + 1 : null;
    }
    
    /**
     * @return int|null
     */
    protected function getLastItem(): ?int
    {
        return $this->total > 0 ? $this->getFirstItem() + $this->countOnPage() - 1 : null;
    }
    
    /**
     * @inheritDoc
     */
    protected function loadProperties(): PropertyCollection
    {
        return new PropertyCollection([
            new PropertyInfo('offset', 'int'),
            new PropertyInfo('perPage', 'int'),
            new PropertyInfo('total', 'int'),
            new PropertyInfo('currentPage', 'int'),
            new PropertyInfo('lastPage', 'int'),
            new PropertyInfo('from', 'int'),
            new PropertyInfo('to', 'int'),
            new PropertyInfo('path', 'string', null)
        ]);
    }
}
