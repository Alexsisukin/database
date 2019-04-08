<?php declare(strict_types=1);
/**
 * Spiral Framework.
 *
 * @license   MIT
 * @author    Anton Titov (Wolfy-J)
 */

namespace Spiral\Database\Driver\MySQL\Schema;

use Spiral\Database\Schema\AbstractIndex;

class MySQLIndex extends AbstractIndex
{
    /**
     * @param string $table
     * @param string $name
     * @param array  $schema
     * @return MySQLIndex
     */
    public static function createInstance(string $table, string $name, array $schema): self
    {
        $index = new self($table, $name);

        foreach ($schema as $definition) {
            $index->type = $definition['Non_unique'] ? self::NORMAL : self::UNIQUE;
            $index->columns[] = $definition['Column_name'];
        }

        return $index;
    }
}