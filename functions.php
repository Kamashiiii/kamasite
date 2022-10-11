<?php

function getFromAPI($url)
{
    $url = str_replace(' ', '', $url);
    $http = curl_init($url);
    curl_setopt($http, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($http);
    curl_close($http);
    $resultObject = json_decode($result);
    return $resultObject;
}


function insertPlayers($listPlayers, $conn)
{
    foreach ($listPlayers as $player) {
        $pseudo = $player;
        $uuid = file_get_contents("https://minecraft-api.com/api/uuid/$player");
        $urlApiAP = "https://api.hypixel.net/player?key=a0f98d24-c4f9-4a8e-8d9d-3e68770ebfd7&uuid=$uuid";
        $dataPlayer = getFromAPI($urlApiAP);


        // stats profile
        $AP = $dataPlayer->player->achievementPoints;
        $totalQuests = 0;
            //var_dump($dataPlayer->player->quests);
            foreach ($dataPlayer->player->quests as $quest) {
                if (isset($quest->completions)) {
                    $totalQuests += count((array)$quest->completions);
                }
            }

        $challenge = $dataPlayer->player->achievements->general_challenger;
            
        $stmt = $conn->prepare("INSERT INTO player VALUES ('$pseudo', '$uuid', $AP, $totalQuests, $challenge)");
        $stmt->execute();


        $BedwarsWinsOverall = $dataPlayer->player->stats->Bedwars->wins_bedwars;
        $BedwarsLossesOverall = $dataPlayer->player->stats->Bedwars->losses_bedwars;
        $BedwarsKillsOverall = $dataPlayer->player->stats->Bedwars->kills_bedwars;
        $BedwarsDeathsOverall = $dataPlayer->player->stats->Bedwars->deaths_bedwars;
        $BedwarsFinalKillsOverall = $dataPlayer->player->stats->Bedwars->final_kills_bedwars;
        $BedwarsFinalDeathsOverall = $dataPlayer->player->stats->Bedwars->final_deaths_bedwars;
        $BedwarsExperience = $dataPlayer->player->stats->Bedwars->Experience;

        $stmt = $conn->prepare("INSERT INTO stats_bedwars VALUES ('$uuid', $BedwarsWinsOverall, $BedwarsLossesOverall, $BedwarsKillsOverall, $BedwarsDeathsOverall, $BedwarsFinalKillsOverall, $BedwarsFinalDeathsOverall, $BedwarsExperience)");
        $stmt->execute();
    }
}


