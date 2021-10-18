<?php

namespace App\JsonApi\V1\Timeentries;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{

    /**
     * @var string
     */
    protected $resourceType = 'timeentries';

    /**
     * @param \App\Timeentry $resource
     *      the domain record being serialized.
     * @return string
     */
    public function getId($resource)
    {
        return (string) $resource->getRouteKey();
    }

    /**
     * @param \App\Timeentry $resource
     *      the domain record being serialized.
     * @return array
     */
    public function getAttributes($resource)
    {
        return [
            'task_id'         => $resource->task_id,
            'task_name'       => $resource->task_name,
            'wid'             => $resource->wid,
            'user_id'         => $resource->user_id,
            'user_username'   => $resource->user_username,
            'user_email'      => $resource->user_email,
            'billable'        => $resource->billable,
            'start'           => $resource->start,
            'end'             => $resource->end,
            'duration'        => $resource->duration,
            'description'     => $resource->description,
            'tags'            => $resource->tags,
            'source'          => $resource->source,
            'at'              => $resource->at,
            'last_modified'   => $resource->last_modified,
            'sourcauthor_ide' => $resource->author_id,
            'disabled'        => $resource->disabled,
            'deleted'         => $resource->deleted
        ];
    }
}
