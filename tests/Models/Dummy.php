<?php declare(strict_types=1);

namespace Izzle\Pagination\Tests\Models;

use Izzle\Model\Model;
use Izzle\Model\PropertyCollection;
use Izzle\Model\PropertyInfo;

class Dummy extends Model
{
    /**
     * @var int|null
     */
    protected ?int $id;
    
    /**
     * @var string|null
     */
    protected ?string $foo;
    
    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }
    
    /**
     * @param int|null $id
     * @return Dummy
     */
    public function setId(?int $id): Dummy
    {
        $this->id = $id;
        
        return $this;
    }
    
    /**
     * @return string|null
     */
    public function getFoo(): ?string
    {
        return $this->foo;
    }
    
    /**
     * @param string|null $foo
     * @return Dummy
     */
    public function setFoo(?string $foo): Dummy
    {
        $this->foo = $foo;
        
        return $this;
    }
    
    /**
     * @return PropertyCollection
     */
    protected function loadProperties(): PropertyCollection
    {
        return new PropertyCollection([
            new PropertyInfo('id', 'int', null),
            new PropertyInfo('foo', 'string', null),
        ]);
    }
}
