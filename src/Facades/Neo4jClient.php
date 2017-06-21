<?php

namespace TSF\Neo4jClient\Facades;


use Illuminate\Support\Facades\Facade;

class Neo4jClient extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'neo4jclient';
    }

}