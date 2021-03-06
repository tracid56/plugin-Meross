<?php

/*
 * This file is part of the NextDom software (https://github.com/NextDom or http://nextdom.github.io).
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, version 2.
 *
 * This program is distributed in the hope that it will be useful, but
 * WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 */

if (!isConnect('admin')) {
    throw new Exception('401 Unauthorized');
}
$eqLogics = meross::byType('meross');
?>

<table class="table table-condensed tablesorter" id="table_healthmeross">
    <thead>
    <tr>
        <th>{{Image}}</th>
        <th>{{Nom}}</th>
        <th>{{ID}}</th>
        <th>{{Modèle}}</th>
        <th>{{Firmware}}</th>
        <th>{{Hardware}}</th>
        <th>{{IP}}</th>
        <th>{{Online}}</th>
        <th>{{Date création}}</th>
        <th>{{Date dernière communication}}</th>

    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($eqLogics as $eqLogic) {
        $opacity = '';
        if ($eqLogic->getIsEnable() != 1) {
            $opacity = 'opacity:0.3;';
        }
        if ($eqLogic->getConfiguration('type', '') != '') {
            $image = '<img src="plugins/meross/core/config/devices/' . $eqLogic->getConfiguration('type', '') . '/icon.png" height="55" width="55" />';
        } else {
            $image = '<img src="plugins/meross/docs/images/meross_icon.png" height="55" width="55" />';
        }
        echo '<tr>';
        echo '<td>' . $image . '</td><td><a href="' . $eqLogic->getLinkToConfiguration() . '" style="text-decoration: none;">' . $eqLogic->getHumanName(true) . '</a></td>';
        echo '<td><span class="label label-info" style="font-size : 1em;">' . $eqLogic->getId() . '</span></td>';
        echo '<td><span class="label label-info" style="font-size : 1em;">' . $eqLogic->getConfiguration('type') . '</span></td>';
        echo '<td><span class="label label-info" style="font-size : 1em;">' . $eqLogic->getConfiguration('firmversion') . '</span></td>';
        echo '<td><span class="label label-info" style="font-size : 1em;">' . $eqLogic->getConfiguration('hardversion') . '</span></td>';
        echo '<td><span class="label label-info" style="font-size : 1em;">' . $eqLogic->getConfiguration('ip') . '</span></td>';
        echo '<td><span class="label label-info" style="font-size : 1em;">' . $eqLogic->getConfiguration('online') . '</span></td>';
        echo '<td><span class="label label-info" style="font-size : 1em;">' . $eqLogic->getConfiguration('createtime') . '</span></td>';
        echo '<td><span class="label label-info" style="font-size : 1em;cursor:default;">' . $eqLogic->getStatus('lastCommunication') . '</span></td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>
