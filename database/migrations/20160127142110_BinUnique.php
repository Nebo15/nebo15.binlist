<?php

class BinUnique extends \Sokil\Mongo\Migrator\AbstractMigration
{
    public function up()
    {
        $this->getCollection('bin')->ensureUniqueIndex('bin');
    }
    
    public function down()
    {
        $this->getCollection('users')->getMongoCollection()->deleteIndex('bin');
    }
}