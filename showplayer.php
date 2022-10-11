<?php

function showPlayersProfil($conn)
{
    $sql= "SELECT pseudo, AP, quests, challenge FROM player ORDER BY AP desc";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $table = $result->fetch_all();

    // Affichage
    echo '<table><thead><tr> <th>▲Rang</th>
        <th>▲Pseudo</th>
        <th>▲AP</th>
        <th>▲Quests</th>
        <th>▲Challenge</th>
        </tr></thead><tbody>';
        $i = 1;

    foreach($table as $player) {
        echo "<tr>";
        echo "<td>$i</td>";
        $i = $i + 1;
        foreach($player as $data) {
            echo "<td>$data</td>";
        }
        echo "</tr>";
    }
    echo '</tbody></table>';
}

function showPlayersBedwars($conn)
{
    $sql = "SELECT pseudo, WinOverall, LoseOverall, KillOverall, DeathOverall, FKOverall, FDOverall, Experience
    FROM player p
    JOIN stats_bedwars b ON p.uuid = b.uuid
    ORDER BY WinOverall desc";

    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    $table = $result->fetch_all();

    // Affichage
    echo '<table><thead><tr> 
        <th>▲Rang</th>
        <th>▲Pseudo</th>
        <th>▲Wins</th>
        <th>▲Losses</th>
        <th>▲Kills</th>
        <th>▲Deaths</th>
        <th>▲FK</th>
        <th>▲FD</th>
        <th>▲Exp</th>
        </tr></thead><tbody>';
        $i = 1;

    foreach($table as $player) {
        echo "<tr>";
        echo "<td>$i</td>";
        $i = $i + 1;
        foreach($player as $data) {
            echo "<td>$data</td>";
        }
        echo "</tr>";
    }
    echo '</tbody></table>';
        
}	
