<?php declare(strict_types=1);

namespace Izzle\Pagination;

use Izzle\Model\Model;
use Izzle\Model\PropertyCollection;
use Izzle\Model\PropertyInfo;

/**
 * Class Links
 * @package Izzle\Pagination
 */
class Links extends Model
{
    /**
     * @var string|null
     */
    protected ?string $first = null;
    
    /**
     * @var string|null
     */
    protected ?string $last = null;
    
    /**
     * @var string|null
     */
    protected ?string $prev = null;
    
    /**
     * @var string|null
     */
    protected ?string $next = null;
    
    /**
     * @return string|null
     */
    public function getFirst(): ?string
    {
        return $this->first;
    }
    
    /**
     * @param string|null $first
     * @return $this
     */
    public function setFirst(?string $first): self
    {
        $this->first = $first;
        
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getLast(): ?string
    {
        return $this->last;
    }
    
    /**
     * @param string|null $last
     * @return $this
     */
    public function setLast(?string $last): self
    {
        $this->last = $last;
        
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getPrev(): ?string
    {
        return $this->prev;
    }
    
    /**
     * @param string|null $prev
     * @return $this
     */
    public function setPrev(?string $prev): self
    {
        $this->prev = $prev;
        
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getNext(): ?string
    {
        return $this->next;
    }
    
    /**
     * @param string|null $next
     * @return $this
     */
    public function setNext(?string $next): self
    {
        $this->next = $next;
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    protected function loadProperties(): PropertyCollection
    {
        return new PropertyCollection([
            new PropertyInfo('first', 'string', null),
            new PropertyInfo('last', 'string', null),
            new PropertyInfo('prev', 'string', null),
            new PropertyInfo('next', 'string', null)
        ]);
    }
}
