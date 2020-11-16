<?php declare(strict_types = 1);

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the License Agreement. See LICENSE file.
 */

namespace StateMachine\Graph;

interface GraphAdapterInterface extends GraphInterface
{
    public const GRAPH = 'graph';
    public const GRAPH_STRICT = 'strict graph';
    public const DIRECTED_GRAPH = 'digraph';
    public const DIRECTED_GRAPH_STRICT = 'strict digraph';
    public const SUB_GRAPH = 'subgraph';
    public const SUB_GRAPH_STRICT = 'strict subgraph';

    /**
     * @param string $name
     * @param array $attributes
     * @param bool $directed
     * @param bool $strict
     *
     * @return $this
     */
    public function create(string $name, array $attributes = [], bool $directed = true, bool $strict = true);
}
