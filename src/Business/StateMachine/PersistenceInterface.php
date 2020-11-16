<?php declare(strict_types = 1);

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the License Agreement. See LICENSE file.
 */

namespace StateMachine\Business\StateMachine;

use Cake\I18n\FrozenTime;
use StateMachine\Dto\StateMachine\ItemDto;
use StateMachine\Dto\StateMachine\ProcessDto;
use StateMachine\Model\Entity\StateMachineTimeout;

interface PersistenceInterface
{
    /**
     * @param \StateMachine\Dto\StateMachine\ProcessDto $processDto
     *
     * @return int
     */
    public function getProcessId(ProcessDto $processDto): int;

    /**
     * @param \StateMachine\Dto\StateMachine\ItemDto $itemDto
     * @param string $stateName
     *
     * @return int
     */
    public function getInitialStateIdByStateName(ItemDto $itemDto, string $stateName): int;

    /**
     * @param \StateMachine\Dto\StateMachine\ItemDto $itemDto
     * @param string $stateName
     *
     * @return \StateMachine\Dto\StateMachine\ItemDto
     */
    public function saveStateMachineItem(ItemDto $itemDto, string $stateName): ItemDto;

    /**
     * @param \StateMachine\Dto\StateMachine\ItemDto[] $stateMachineItems
     *
     * @return \StateMachine\Dto\StateMachine\ItemDto[]
     */
    public function updateStateMachineItemsFromPersistence(array $stateMachineItems): array;

    /**
     * @param int $itemIdentifier
     * @param int $idStateMachineProcess
     *
     * @return \StateMachine\Dto\StateMachine\ItemDto[]
     */
    public function getStateHistoryByStateItemIdentifier(int $itemIdentifier, int $idStateMachineProcess): array;

    /**
     * @param \StateMachine\Dto\StateMachine\ItemDto $itemDto
     *
     * @return \StateMachine\Dto\StateMachine\ItemDto
     */
    public function getProcessedItemDto(ItemDto $itemDto): ItemDto;

    /**
     * @param \StateMachine\Dto\StateMachine\ItemDto[] $stateMachineItems
     *
     * @return \StateMachine\Dto\StateMachine\ItemDto[]
     */
    public function getProcessedStateMachineItems(array $stateMachineItems): array;

    /**
     * @param string $processName
     * @param string $stateMachineName
     * @param string[] $states
     *
     * @return int[]
     */
    public function getStateMachineItemIdsByStatesProcessAndStateMachineName(
        string $processName,
        string $stateMachineName,
        array $states
    ): array;

    /**
     * @param \StateMachine\Dto\StateMachine\ItemDto $itemDto
     *
     * @return void
     */
    public function saveItemStateHistory(ItemDto $itemDto): void;

    /**
     * @param \StateMachine\Dto\StateMachine\ItemDto $itemDto
     * @param \Cake\I18n\FrozenTime $timeoutDate
     * @param string $eventName
     *
     * @return \StateMachine\Model\Entity\StateMachineTimeout
     */
    public function saveStateMachineItemTimeout(
        ItemDto $itemDto,
        FrozenTime $timeoutDate,
        string $eventName
    ): StateMachineTimeout;

    /**
     * @param \StateMachine\Dto\StateMachine\ItemDto $itemDto
     *
     * @return void
     */
    public function dropTimeoutByItem(ItemDto $itemDto): void;

    /**
     * @param string $stateMachineName
     *
     * @return \StateMachine\Dto\StateMachine\ItemDto[]
     */
    public function getItemsWithExpiredTimeouts(string $stateMachineName): array;
}
