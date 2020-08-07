<?php declare(strict_types=1);

namespace Izzle\Pagination;

use Izzle\Model\Model;
use Izzle\Model\PropertyCollection;
use Izzle\Model\PropertyInfo;

/**
 * Class Pagination
 * @package Izzle\Pagination
 */
class Pagination extends Model
{
    /**
     * @var array
     */
    protected array $data = [];
    
    /**
     * @var Links|null
     */
    protected ?Links $links = null;
    
    /**
     * @var Meta|null
     */
    protected ?Meta $meta = null;
    
    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }
    
    /**
     * @param array $data
     * @return $this
     */
    public function setData(array $data): self
    {
        $this->data = $data;
        
        return $this;
    }
    
    /**
     * @return Links|null
     */
    public function getLinks(): ?Links
    {
        return $this->links;
    }
    
    /**
     * @param Links $links
     * @return $this
     */
    public function setLinks(Links $links): self
    {
        $this->links = $links;
        
        return $this;
    }
    
    /**
     * @return Meta|null
     */
    public function getMeta(): ?Meta
    {
        return $this->meta;
    }
    
    /**
     * @param Meta $meta
     * @return $this
     */
    public function setMeta(Meta $meta): self
    {
        $this->meta = $meta;
        
        return $this;
    }
    
    /**
     * @inheritDoc
     */
    protected function loadProperties(): PropertyCollection
    {
        return new PropertyCollection([
            new PropertyInfo('data', 'array', []),
            new PropertyInfo('links', Links::class, null, true),
            new PropertyInfo('meta', Meta::class, null, true)
        ]);
    }
}
