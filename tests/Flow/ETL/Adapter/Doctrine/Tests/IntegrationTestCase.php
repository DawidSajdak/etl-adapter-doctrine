<?php

declare(strict_types=1);

namespace Flow\ETL\Adapter\Doctrine\Tests;

use Doctrine\DBAL\DriverManager;
use Flow\ETL\Adapter\Doctrine\Tests\Context\DatabaseContext;
use PHPUnit\Framework\TestCase;

abstract class IntegrationTestCase extends TestCase
{
    protected DatabaseContext $pgsqlDatabaseContext;

    protected function setUp() : void
    {
        $this->pgsqlDatabaseContext = new DatabaseContext(DriverManager::getConnection($this->connectionParams()));
    }

    protected function tearDown() : void
    {
        $this->pgsqlDatabaseContext->dropAllTables();
    }

    protected function connectionParams() : array
    {
        return ['url' => \getenv('PGSQL_DATABASE_URL')];
    }
}
