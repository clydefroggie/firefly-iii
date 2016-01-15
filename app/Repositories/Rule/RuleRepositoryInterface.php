<?php
/**
 * RuleRepositoryInterface.php
 * Copyright (C) 2016 Sander Dorigo
 *
 * This software may be modified and distributed under the terms
 * of the MIT license.  See the LICENSE file for details.
 */

namespace FireflyIII\Repositories\Rule;

use FireflyIII\Models\Rule;
use FireflyIII\Models\RuleAction;
use FireflyIII\Models\RuleGroup;
use FireflyIII\Models\RuleTrigger;
use Illuminate\Support\Collection;

/**
 * Interface RuleRepositoryInterface
 *
 * @package FireflyIII\Repositories\Rule
 */
interface RuleRepositoryInterface
{
    /**
     * @param array $data
     *
     * @return RuleGroup
     */
    public function storeRuleGroup(array $data);

    /**
     * @return int
     */
    public function getHighestOrderRuleGroup();


    /**
     * @param RuleGroup $ruleGroup
     * @param array     $data
     *
     * @return RuleGroup
     */
    public function updateRuleGroup(RuleGroup $ruleGroup, array $data);


    /**
     * @param RuleGroup $ruleGroup
     * @param RuleGroup $moveTo
     *
     * @return bool
     */
    public function destroyRuleGroup(RuleGroup $ruleGroup, RuleGroup $moveTo = null);

    /**
     * @param Rule $rule
     *
     * @return bool
     */
    public function destroyRule(Rule $rule);

    /**
     * @param Rule  $rule
     * @param array $ids
     * @return bool
     */
    public function reorderRuleTriggers(Rule $rule, array $ids);

    /**
     * @param Rule  $rule
     * @param array $ids
     * @return bool
     */
    public function reorderRuleActions(Rule $rule, array $ids);

    /**
     * @return bool
     */
    public function resetRuleGroupOrder();

    /**
     * @return bool
     */
    public function resetRulesInGroupOrder(RuleGroup $ruleGroup);

    /**
     * @param Rule $rule
     * @return bool
     */
    public function moveRuleUp(Rule $rule);

    /**
     * @param Rule  $rule
     * @param array $data
     * @return Rule
     */
    public function updateRule(Rule $rule, array $data);

    /**
     * @param Rule $rule
     * @return bool
     */
    public function moveRuleDown(Rule $rule);

    /**
     * @param RuleGroup $ruleGroup
     * @return bool
     */
    public function moveRuleGroupUp(RuleGroup $ruleGroup);

    /**
     * @param RuleGroup $ruleGroup
     * @return bool
     */
    public function moveRuleGroupDown(RuleGroup $ruleGroup);

    /**
     * @return Collection
     */
    public function getRuleGroups();

    /**
     * @param array $data
     *
     * @return Rule
     */
    public function storeRule(array $data);

    /**
     * @param RuleGroup $ruleGroup
     *
     * @return int
     */
    public function getHighestOrderInRuleGroup(RuleGroup $ruleGroup);


    /**
     * @param Rule   $rule
     * @param string $action
     * @param string $value
     * @param bool   $stopProcessing
     * @param int    $order
     *
     * @return RuleTrigger
     */
    public function storeTrigger(Rule $rule, $action, $value, $stopProcessing, $order);

    /**
     * @param Rule   $rule
     * @param string $action
     * @param string $value
     * @param bool   $stopProcessing
     * @param int    $order
     *
     * @return RuleAction
     */
    public function storeAction(Rule $rule, $action, $value, $stopProcessing, $order);

}