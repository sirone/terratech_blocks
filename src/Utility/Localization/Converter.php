<?php
namespace App\Utility\Localization;

use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\Utility\Text;

/**
 * Loc_*.txt ファイルの内容を解析する.
 */
class Converter
{
    public static function read(string $type='Japanese') {
        $directory = new Folder(WWW_ROOT.'loc');
        $loc_files = $directory->find('.*\.txt');

        $translate_map = '';
        foreach ($loc_files as $file) {
            if ($file !== "LOC_{$type}.txt") continue;

            $file = new File($directory->pwd().DS.$file);
            $translate_map = $file->read();
            $file->close();
        }

        $maps = explode("\r\n", $translate_map);
        $data = [];
        $index_name = '';
        $whitelist = [
            '$BlockNames','$BlockDescription','$BlockCategoryName','$BlockRarityName','$BlockAttributes','$BlockControlCategoryNames',
            '$BlockControlAttributes','$SceneryName','$SceneryDescription','$ChunkName','$ChunkDescription','$ChunkCategoryName',
            '$ChunkRarityName','$ComponentTierName'];
        foreach ($maps as $string) {
            if (strpos($string, '$') === 0) {
                $index_name = $string;
                continue;
            }
            if (!in_array($index_name, $whitelist)) {
                break;
            }
            $translation = explode(':', $string);
            if (is_array($translation) && isset($translation[0]) && isset($translation[1])) {
                $translation = "{$translation[0]}\t{$translation[1]}";
            }
            $data[$index_name][] = $translation;
        }

        return $data;
    }
}
