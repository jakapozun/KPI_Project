<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        return view('element');
    }

    public function getData()
    {
        $response =
            [
                [
                    ["IT-KPI", "1", "1","1", null, null, "ROI TEST", "Žiga Belec", "Bonus test", "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.", "ITPV-52"],
                    ["IT-KPI", "2", "1","0", null, null, "ROI TEST", "Žiga Belec", "Bonus test", "Opombe...", "ITPV-52"],
                    ["IT-KPI", "3", "1","0", null, null, "ROI TEST", "Žiga Belec", "Bonus test", "Opombe...", "ITPV-52"],
                    ["IT-KPI", "4", "1","0", null, null, "ROI TEST", "Žiga Belec", "Bonus test", "Opombe...", "ITPV-52"],
                    ["IT-KPI", "5", "1","0", null, null, "ROI TEST", "Žiga Belec", "Bonus test", "Opombe...", "ITPV-52"],
                    ["IT-KPI", "6", "1","0", null, null, "ROI TEST", "Žiga Belec", "Bonus test", "Opombe...", "ITPV-52"],
                    ["IT-KPI", "7", "1","0", null, null, "ROI TEST", "Žiga Belec", "Bonus test", "Opombe...", "ITPV-52"],
                    ["IT-KPI", "8", "1","0", null, null, "ROI TEST", "Žiga Belec", "Bonus test", "Opombe...", "ITPV-52"],
                    ["IT-KPI", "9", "1","0", null, null, "ROI TEST", "Žiga Belec", "Bonus test", "Opombe...", "ITPV-52"],
                ],
                [
                    ["HRRework-I.Faza", "1", "5", "2", null, null, "ROI TEST", "Janez Novak", "Bonus test", "Opombe...", "ITPV-52"],
                    ["HRRework-I.Faza", "2", "5", "2", null, null, "ROI TEST", "Janez Novak", "Bonus test", "Opombe...", "ITPV-52"],
                    ["HRRework-I.Faza", "3", "5", "2", null, null, "ROI TEST", "Janez Novak", "Bonus test", "Opombe...", "ITPV-52"],
                    ["HRRework-I.Faza", "4", "5", "2", null, null, "ROI TEST", "Janez Novak", "Bonus test", "Opombe...", "ITPV-52"],
                    ["HRRework-I.Faza", "5", "5", "1", "2021-03-12", null, "ROI TEST", "Janez Novak", "Bonus test", "Opombe...", "ITPV-52"],
                    ["HRRework-I.Faza", "6", "5", "0", "2021-02-19", null, "ROI TEST", "Janez Novak", "Bonus test", "Opombe...", "ITPV-52"],
                    ["HRRework-I.Faza", "7", "5", "0", "2021-02-26", null, "ROI TEST", "Janez Novak", "Bonus test", "Opombe...", "ITPV-52"],
                    ["HRRework-I.Faza", "8", "5", "0", "2021-04-01", null, "ROI TEST", "Janez Novak", "Bonus test", "Opombe...", "ITPV-52"],
                    ["HRRework-I.Faza", "9", "5", "0", "2021-07-01", null, "ROI TEST", "Janez Novak", "Bonus test", "Opombe...", "ITPV-52"],
                ],
                [
                    ["Jira-Spremembe", "1", "9","2", "2021-02-11", "2021-02-10", "ROI TEST", "Mojca Horvat", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Jira-Spremembe", "2", "9","2", "2019-11-22", "2019-11-22", "ROI TEST", "Mojca Horvat", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Jira-Spremembe", "3", "9","2", "2019-11-29", "2019-11-29", "ROI TEST", "Mojca Horvat", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Jira-Spremembe", "4", "9","2", "2019-12-06", "2019-12-06", "ROI TEST", "Mojca Horvat", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Jira-Spremembe", "5", "9","2", "2020-12-01", "2020-12-01", "ROI TEST", "Mojca Horvat", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Jira-Spremembe", "6", "9","2", "2021-02-12", null, "ROI TEST", "Mojca Horvat", "Bonus test","Opombe...", "ITPV-52"],
                    ["Jira-Spremembe", "7", "9","2", "2021-02-12", null, "ROI TEST", "Mojca Horvat", "Bonus test","Opombe...", "ITPV-52"],
                    ["Jira-Spremembe", "8", "9","2", "2021-05-5", null, "ROI TEST", "Mojca Horvat", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Jira-Spremembe", "9", "9","2", "2021-01-19", null, "ROI TEST","Mojca Horvat", "Bonus test", "Opombe...", "ITPV-52"],
                ],
                [
                    ["Jira-Dodatki", "1", "2","2", "2021-02-11", "2021-02-10", "ROI TEST", "Nika Horvat", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Jira-Dodatki", "2", "2","1", "2019-11-22", "2019-11-22", "ROI TEST", "Nika Horvat", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Jira-Dodatki", "3", "2","0", "2019-11-29", "2019-11-29", "ROI TEST", "Nika Horvat", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Jira-Dodatki", "4", "2","0", "2019-12-06", "2019-12-06", "ROI TEST", "Nika Horvat", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Jira-Dodatki", "5", "2","0", "2020-12-01", "2020-12-01", "ROI TEST", "Nika Horvat", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Jira-Dodatki", "6", "2","0", "2021-02-12", null, "ROI TEST", "Nika Horvat", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Jira-Dodatki", "7", "2","0", "2021-02-12", null, "ROI TEST", "Nika Horvat", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Jira-Dodatki", "8", "2","0", "2021-02-19", null, "ROI TEST", "Nika Horvat", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Jira-Dodatki", "9", "2","0", "2021-08-19", null, "ROI TEST", "Nika Horvat", "Bonus test", "Opombe...", "ITPV-52"],
                ],
                [
                    ["Rezervacije Vozil", "1", "9","2", "2021-02-11", "2021-02-10", "ROI TEST", "Jaka Pozun", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Rezervacije Vozil", "2", "9","2", "2019-11-22", "2019-11-22", "ROI TEST", "Jaka Pozun", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Rezervacije Vozil", "3", "9","2", "2019-11-29", "2019-11-29", "ROI TEST", "Jaka Pozun", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Rezervacije Vozil", "4", "9","2", "2019-12-06", "2019-12-06", "ROI TEST", "Jaka Pozun", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Rezervacije Vozil", "5", "9","2", "2020-12-01", "2020-12-01", "ROI TEST", "Jaka Pozun", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Rezervacije Vozil", "6", "9","2", "2021-02-12", "2021-02-12", "ROI TEST", "Jaka Pozun", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Rezervacije Vozil", "7", "9","2", "2021-02-12", "2021-02-12", "ROI TEST", "Jaka Pozun", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Rezervacije Vozil", "8", "9","2", "2021-02-19", "2021-02-19", "ROI TEST", "Jaka Pozun", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Rezervacije Vozil", "9", "9","2", "2021-05-19", "2021-05-19", "ROI TEST", "Jaka Pozun", "Bonus test", "Opombe...", "ITPV-52"],
                ],
                [
                    ["DNP", "1", "7","2", "2021-02-11", "2021-02-10", "ROI TEST", "Franci Vas", "Bonus test", "Opombe...", "ITPV-52"],
                    ["DNP", "2", "7","2", "2019-11-22", "2019-11-22", "ROI TEST", "Franci Vas", "Bonus test", "Opombe...", "ITPV-52"],
                    ["DNP", "3", "7","2", "2019-11-29", "2019-11-29", "ROI TEST", "Franci Vas", "Bonus test", "Opombe...", "ITPV-52"],
                    ["DNP", "4", "7","2", "2019-12-06", "2019-12-06", "ROI TEST", "Franci Vas", "Bonus test", "Opombe...", "ITPV-52"],
                    ["DNP", "5", "7","2", "2020-12-01", "2020-12-01", "ROI TEST", "Franci Vas", "Bonus test", "Opombe...", "ITPV-52"],
                    ["DNP", "6", "7","2", "2021-02-12", "2021-02-12", "ROI TEST", "Franci Vas", "Bonus test", "Opombe...", "ITPV-52"],
                    ["DNP", "7", "7","1", "2021-02-12", "2021-02-12", "ROI TEST", "Franci Vas", "Bonus test", "Opombe...", "ITPV-52"],
                    ["DNP", "8", "7","0", "2021-02-19", "2021-02-19", "ROI TEST", "Franci Vas", "Bonus test", "Opombe...", "ITPV-52"],
                    ["DNP", "9", "7","0", "2021-05-19", "2021-05-19", "ROI TEST", "Franci Vas", "Bonus test", "Opombe...", "ITPV-52"],
                ],
                [
                    ["PL Project", "1", "7","3", "2021-02-11", "2021-02-10", "ROI TEST", "Peter Pan", "Bonus test", "Opombe...", "ITPV-52"],
                    ["PL Project", "2", "7","3", "2019-11-22", "2019-11-22", "ROI TEST", "Peter Pan", "Bonus test", "Opombe...", "ITPV-52"],
                    ["PL Project", "3", "7","3", "2019-11-29", "2019-11-29", "ROI TEST", "Peter Pan", "Bonus test", "Opombe...", "ITPV-52"],
                    ["PL Project", "4", "7","3", "2019-12-06", "2019-12-06", "ROI TEST", "Peter Pan", "Bonus test", "Opombe...", "ITPV-52"],
                    ["PL Project", "5", "7","3", "2020-12-01", "2020-12-01", "ROI TEST", "Peter Pan", "Bonus test", "Opombe...", "ITPV-52"],
                    ["PL Project", "6", "7","3", "2021-02-12", "2021-02-12", "ROI TEST", "Peter Pan", "Bonus test", "Opombe...", "ITPV-52"],
                    ["PL Project", "7", "7","3", "2021-02-12", "2021-02-12", "ROI TEST", "Peter Pan", "Bonus test", "Opombe...", "ITPV-52"],
                    ["PL Project", "8", "7","3", "2021-02-19", "2021-02-19", "ROI TEST", "Peter Pan", "Bonus test", "Opombe...", "ITPV-52"],
                    ["PL Project", "9", "7","3", "2021-05-19", "2021-05-19", "ROI TEST", "Peter Pan", "Bonus test", "Opombe...", "ITPV-52"],
                ],
                [
                    ["Koledar", "1", "9","2", "2021-02-11", "2021-02-10", "ROI TEST", "Lan Vidmar", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Koledar", "2", "9","2", "2019-11-22", "2019-11-22", "ROI TEST", "Lan Vidmar", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Koledar", "3", "9","2", "2019-11-29", "2019-11-29", "ROI TEST", "Lan Vidmar", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Koledar", "4", "9","2", "2019-12-06", "2019-12-06", "ROI TEST", "Lan Vidmar", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Koledar", "5", "9","2", "2020-12-01", "2020-12-01", "ROI TEST", "Lan Vidmar", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Koledar", "6", "9","2", "2021-02-12", null, "ROI TEST", "Lan Vidmar", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Koledar", "7", "9","2", "2021-02-12", null, "ROI TEST", "Lan Vidmar", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Koledar", "8", "9","2", "2021-02-19", null, "ROI TEST", "Lan Vidmar", "Bonus test", "Opombe...", "ITPV-52"],
                    ["Koledar", "9", "9","4", "2021-05-19", null, "ROI TEST", "Lan Vidmar", "Bonus test", "Opombe...", "ITPV-52"],
                ],
//                [
//                    ["IT - KPI", "1", "5", "2", "2021-01-25", "2021-01-25", null, null, null, null, "ITPV-49"],
//                    ["IT - KPI", "2", "5", "2", "2021-01-27", "2021-01-27", null, null, null, null, "ITPV-49"],
//                    ["IT - KPI", "3", "5", "2", "2021-01-29", "2021-01-29", null, null, null, null, "ITPV-49"],
//                    ["IT - KPI", "4", "5", "2", "2021-02-01", "2021-02-01", null, null, null, null, "ITPV-49"],
//                    ["IT - KPI", "5", "5", "1", "2021-03-26", null, null, null, null, null, "ITPV-49"],
//                    ["IT - KPI", "6", "5", "0", "2021-03-31", null, null, null, null, null, "ITPV-49"],
//                    ["IT - KPI", "7", "5", "0", "2021-04-02", null, null, null, null, null, "ITPV-49"],
//                    ["IT - KPI", "8", "5", "0", "2021-04-02", null, null, null, null, null, "ITPV-49"],
//                    ["IT - KPI", "9", "5", "0", "2021-07-02", null, null, null, null, null, "ITPV-49"]
//                ]
            ];

        return json_encode($response);
    }
}
