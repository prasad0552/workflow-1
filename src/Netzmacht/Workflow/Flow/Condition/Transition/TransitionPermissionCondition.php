<?php

/**
 * @package    dev
 * @author     David Molineus <david.molineus@netzmacht.de>
 * @copyright  2014 netzmacht creative David Molineus
 * @license    LGPL 3.0
 * @filesource
 *
 */

namespace Netzmacht\Workflow\Flow\Condition\Transition;

use Netzmacht\Workflow\Flow\Context;
use Netzmacht\Workflow\Flow\Item;
use Netzmacht\Workflow\Flow\Transition;

/**
 * Class TransitionPermissionCondition limit permission of a transition to the given transition roles.
 *
 * @package Netzmacht\Workflow\Flow\Condition\Transition
 */
class TransitionPermissionCondition extends AbstractPermissionCondition
{
    /**
     * {@inheritdoc}
     */
    public function match(Transition $transition, Item $item, Context $context)
    {
        $permission = $transition->getPermission();

        if ($permission && $this->user->hasPermission($permission)) {
            return $this->pass();
        }

        return $this->fail(
            'transition.condition.transition-permission',
            array((string) $permission)
        );
    }
}