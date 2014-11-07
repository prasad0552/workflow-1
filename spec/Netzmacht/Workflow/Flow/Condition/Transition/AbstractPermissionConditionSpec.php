<?php

namespace spec\Netzmacht\Workflow\Flow\Condition\Transition;

use Netzmacht\Workflow\Security\Permission;
use Netzmacht\Workflow\Security\Role;
use Netzmacht\Workflow\Security\User;
use Netzmacht\Workflow\Flow\Condition\Transition\AbstractPermissionCondition;
use Netzmacht\Workflow\Flow\Context;
use Netzmacht\Workflow\Flow\Item;
use Netzmacht\Workflow\Flow\Transition;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

/**
 * Class AbstractPermissionConditionSpec
 * @package spec\Netzmacht\Workflow\Flow\Condition\Transition
 * @mixin PermissionCondition
 */
class AbstractPermissionConditionSpec extends ObjectBehavior
{
    function let(User $user, Permission $permission)
    {
        $this->beAnInstanceOf('spec\Netzmacht\Workflow\Flow\Condition\Transition\PermissionCondition');
        $this->beConstructedWith($user);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('Netzmacht\Workflow\Flow\Condition\Transition\AbstractPermissionCondition');
    }

    function it_is_a_transition_condition()
    {
        $this->shouldImplement('Netzmacht\Workflow\Flow\Condition\Transition\Condition');
    }

    function it_gets_the_user(User $user)
    {
        $this->getUser()->shouldReturn($user);
    }
}

class PermissionCondition extends AbstractPermissionCondition
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
        // TODO: Implement match() method.
    }
}