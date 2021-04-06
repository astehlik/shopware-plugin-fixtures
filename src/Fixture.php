<?php

declare(strict_types=1);

namespace Basecom\FixturePlugin;

abstract class Fixture
{
    abstract public function load(FixtureBag $bag): void;

    /** @return string[] */
    public function dependsOn(): array
    {
        return [];
    }

    public function priority(): int
    {
        return 0;
    }
}
