<?php

declare(strict_types=1);

namespace Kiboko\Component\Satellite\Plugin\Stream;

use Kiboko\Component\Satellite\Plugin\Stream\Builder;
use Kiboko\Contract\Configurator;
use Kiboko\Contract\Packaging;

final class Repository implements Configurator\StepRepositoryInterface
{
    public function __construct(
        private Builder\StderrLoader|Builder\StdoutLoader|Builder\JSONStreamLoader|Builder\DebugLoader $builder
    ) {
    }

    public function addFiles(Packaging\FileInterface|Packaging\DirectoryInterface ...$files): Repository
    {
        return $this;
    }

    public function getFiles(): iterable
    {
        return new \EmptyIterator();
    }

    public function addPackages(string ...$packages): Repository
    {
        return $this;
    }

    public function getPackages(): iterable
    {
        return new \EmptyIterator();
    }

    public function getBuilder(): Builder\StderrLoader|Builder\StdoutLoader|Builder\JSONStreamLoader|Builder\DebugLoader
    {
        return $this->builder;
    }

    public function merge(Configurator\RepositoryInterface $friend): Repository
    {
        return $this;
    }
}
