<?php

require_once('sync.php');

ob_implicit_flush();

$sync = new \Menrui\AdbSync(
    '/usr/bin/adb',
    '192.168.11.44:5555',
);

$sync->srcPath = '/mnt/d/files/roms/rebuild';
$sync->dstPath = '/storage/B42F-0FFA/Android/data/com.retroarch/files/ROM';
$sync->sync(
    [
        'a26'        => 'full',
        'a52'        => 'full',
        'a78'        => 'full',
        'bll'        => 'full',
        'fds'        => 'full',
        'gb'         => 'full:zip',
        'gba'        => 'full:zip',
        'gbc'        => 'full:zip',
        'gg'         => 'full:zip',
        'jaguar_abs' => 'full',
        'jaguar_cof' => 'full',
        'jaguar_j64' => 'full',
        'jaguar_jag' => 'full',
        'jaguar_rom' => 'full',
        'lnx'        => 'full:zip',
        'lyx'        => 'full:zip',
        'mame'       => 'rand:4g',
        'md'         => 'full:zip',
        'msx'        => 'full',
        'msx2'       => 'full',
        'n64'        => 'rand:1g',
        'nds'        => 'rand:1g',
        'nes'        => 'full:zip',
        'ngc'        => 'full:zip',
        'ngp'        => 'full:zip',
        'pc98'       => 'rand:1g',
        'pce'        => 'full:zip',
        'psp'        => 'rand:1g,ext',
        'sf_turbo'   => 'full',
        'sms'        => 'full:zip',
        'snes'       => 'full:zip',
        'tosec_psp'  => 'rand:4g',
        'ws'         => 'full:zip',
        'wsc'        => 'full:zip',
        'x68'        => 'rand:1g',
    ],
);

$sync->srcPath = '/mnt/d/files/roms/src';
$sync->dstPath = '/storage/B42F-0FFA/Android/data/com.retroarch/files/ROM/src';
$sync->sync(
    [
        'pcecd'  => 'rand:4g,ext',
        'pcfx'   => 'rand:4g,ext',
        'psp'    => 'rand:4g,ext',
        'psx'    => 'rand:4g,ext',
        'segacd' => 'rand:4g,ext',
    ],
);
