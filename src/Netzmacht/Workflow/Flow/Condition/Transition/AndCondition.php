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
use Netzmacht\Workflow\Flow\Transition;
use Netzmacht\Workflow\Flow\Item;

/**
 * Class AndCondition matches if all child conditions does.
 *
 * @package Netzmacht\Workflow\Flow\Condition\Transition
 */
class AndCondition extends ConditionCollection
{
    /**
     * Consider if condition matches for the given entity.
     *
     * @param Transition $transition The transition being in.
     * @param Item       $item       The entity being transits.
     * @param Context    $context    The transition context.
     *
     * @return bool
     */
    public function match(Transition $transition, Item $item, Context $context)
    {
        foreach ($this->conditions as $condition) {
            if (!$condition->match($transition, $item, $context)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Describes an failed condition.
     *
     * It returns an array with 2 parameters. First one is the error message code. The second one are the params to
     * be replaced in the message.
     *
     * Example return array('transition.condition.example', array('name', 'value'));
     *
     * @param Transition $transition The transition being in.
     * @param Item       $item       The entity being transits.
     * @param Context    $context    The transition context.
     *
     * @return array
     */
    public function describeError(Transition $transition, Item $item, Context $context)
    {
        return array(
            'transition.condition.and',
            $this->describeChildConditionErrors($transition, $item, $context)
        );
    }
}
