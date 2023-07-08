<?php

header("Content-type: application/json;");

function process_config_array(&$configs_array, $key, $row_class)
{
    $configs_array[$key][0] = str_ireplace(
        "<td class='" . $row_class . "' style='text-align: center;'><img src='",
        "",
        $configs_array[$key][0]
    );
    $configs_array[$key][0] = str_ireplace(
        "' width='32' height='32' /><br>",
        "<br>",
        $configs_array[$key][0]
    );
    $configs_array[$key][0] = explode("<br>", $configs_array[$key][0]);

    $configs_array[$key][1] = str_ireplace(
        "<td class='" . $row_class . "'><b><span style='font-size: 9pt;'>",
        "",
        $configs_array[$key][1]
    );
    $configs_array[$key][1] = str_ireplace(
        "</span>",
        "",
        $configs_array[$key][1]
    );
    $configs_array[$key][1] = str_ireplace("</b>", "", $configs_array[$key][1]);
    $configs_array[$key][1] = str_ireplace(
        "<span style='font-size: 10pt;'>",
        "",
        $configs_array[$key][1]
    );
    $configs_array[$key][1] = str_ireplace(
        "<span style='font-size: 7pt;'>",
        "",
        $configs_array[$key][1]
    );
    $configs_array[$key][1] = explode("<br>", $configs_array[$key][1]);

    $configs_array[$key][2] = str_ireplace(
        "</span>",
        "",
        $configs_array[$key][2]
    );
    $configs_array[$key][2] = str_ireplace(
        "<td class='" .
            $row_class .
            "' style='text-align: right;'><b><span style='font-size: 10pt;'>",
        "",
        $configs_array[$key][2]
    );
    $configs_array[$key][2] = str_ireplace(
        "</b><BR><span style='font-size: 9pt;'>",
        "<br>",
        $configs_array[$key][2]
    );
    $configs_array[$key][2] = str_ireplace(
        "<BR>",
        "<br>",
        $configs_array[$key][2]
    );
    $configs_array[$key][2] = explode("<br>", $configs_array[$key][2]);

    $configs_array[$key][3] = str_ireplace(
        "</span>",
        "",
        $configs_array[$key][3]
    );
    $configs_array[$key][3] = str_ireplace(
        "<td class='" .
            $row_class .
            "' style='text-align: right;'><b><span style='font-size: 10pt;'>",
        "",
        $configs_array[$key][3]
    );
    $configs_array[$key][3] = str_ireplace(
        "</span>",
        "",
        $configs_array[$key][3]
    );
    $configs_array[$key][3] = str_ireplace(
        "<BR><BR>",
        "<br>",
        $configs_array[$key][3]
    );
    $configs_array[$key][3] = str_ireplace(
        "<BR>",
        "<br>",
        $configs_array[$key][3]
    );
    $configs_array[$key][3] = str_ireplace("<b>", "", $configs_array[$key][3]);
    $configs_array[$key][3] = str_ireplace("</b>", "", $configs_array[$key][3]);
    $configs_array[$key][3] = explode("<br>", $configs_array[$key][3]);

    $configs_array[$key][4] = str_ireplace(
        "<td class='" .
            $row_class .
            "' style='text-align: center;'><a href='howto_softether.aspx'><img height='33' src='../images/yes_33.png' width='33' /><br><b>",
        "",
        $configs_array[$key][4]
    );
    $configs_array[$key][4] = str_ireplace(
        "<BR>Connect guide</b></a><br>",
        "<BR>",
        $configs_array[$key][4]
    );
    $configs_array[$key][4] = explode("<BR>", $configs_array[$key][4]);

    $configs_array[$key][5] = "";

    $configs_array[$key][6] = str_ireplace(
        "<td class='" . $row_class . "' style='text-align: center;'><a href='",
        "",
        $configs_array[$key][6]
    );
    $configs_array[$key][6] = str_ireplace(
        "'><img height='33' src='../images/yes_33.png' width='33' /><br><b>",
        "<br>",
        $configs_array[$key][6]
    );
    $configs_array[$key][6] = str_ireplace(
        "<BR>Config file</b></a><br>",
        "<br>",
        $configs_array[$key][6]
    );
    $configs_array[$key][6] = explode("<br>", $configs_array[$key][6]);

    $configs_array[$key][7] = str_ireplace(
        "<td class='" .
            $row_class .
            "' style='text-align: center; word-break: break-all; white-space: normal;'><a href='howto_sstp.aspx'><img height='33' src='../images/yes_33.png' width='33' />",
        "",
        $configs_array[$key][7]
    );
    $configs_array[$key][7] = str_ireplace(
        "<br><b>",
        "",
        $configs_array[$key][7]
    );
    $configs_array[$key][7] = str_ireplace(
        "<BR>Connect guide</b></a><p style='text-align: left'><span style='font-size: 8pt;' >SSTP Hostname :<br /><b><span style='color: #006600;' >",
        "<br>",
        $configs_array[$key][7]
    );
    $configs_array[$key][7] = str_ireplace(
        "</span></b></span></p>",
        "",
        $configs_array[$key][7]
    );
    $configs_array[$key][7] = explode("<br>", $configs_array[$key][7]);

    return $configs_array;
}

function vpngate()
{
    $vpngate_data = file_get_contents("https://www.vpngate.net/en/");
    $pattern =
        "#<td class='vg_table_row_(.*?)' style='text-align: center;'><img src='../images/flags/(.*?)' width='32' height='32' />(.*?)</td><td class='vg_table_row_(.*?)'><b><span style='font-size: 9pt;'>(.*?)</span></td><td class='vg_table_row_(.*?)' style='text-align: right;'><b><span style='font-size: 10pt;'>(.*?)</td><td class='vg_table_row_(.*?)' style='text-align: right;'><b><span style='font-size: 10pt;'>(.*?)</td><td class='vg_table_row_(.*?)' style='text-align: center;'><a href='howto_softether.aspx'><img height='33' src=(.*?) width='33' />(.*?)</td><td class='vg_table_row_(.*?)' style='text-align: center;'>(.*?)</td><td class='vg_table_row_(.*?)' style='text-align: center;'><a href='(.*?)'><img height='33' src=(.*?) width='33' />(.*?)</td><td class='vg_table_row_(.*?)' style='text-align: center; word-break: break-all; white-space: normal;'><a href='howto_sstp.aspx'><img height='33' src='(.*?)' width='33' />(.*?)</td>#";
    preg_match_all($pattern, $vpngate_data, $match);
    $data_array = $match[0];
    $configs_array = [];
    foreach ($data_array as $key => $config_data) {
        $configs_array[$key] = explode("</td>", $config_data);
        if (stripos($config_data, "vg_table_row_1") !== false) {
            $configs_array = process_config_array(
                $configs_array,
                $key,
                "vg_table_row_1"
            );
        } else {
            $configs_array = process_config_array(
                $configs_array,
                $key,
                "vg_table_row_0"
            );
        }
    }

    return $configs_array;
}

?>
