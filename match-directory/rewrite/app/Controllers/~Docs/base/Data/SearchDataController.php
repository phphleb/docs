<?php

declare(strict_types=1);

namespace App\Controllers\Docs\Data;

use Hleb\Base\Controller;
use Hleb\Static\Request;
use Phphleb\Docs\Config;
use Phphleb\Docs\Src\Search;

class SearchDataController extends Controller
{
    public function index(): array
    {
        $data = Request::post('json_data')->asArray();

        if (!isset($data['text']) || empty($data['uri']) || count((array)$data['uri']) !== 3) {
            return [
                'result' => 'error',
                'message' => 'No required values provided',
            ];
        }

        [$lang, $version, $subversion] = (array)$data['uri'];

        $text = (string)($data['text']);
        $maxLen = $lang === 'zh' ? 1 : Config::MIN_SEARCH_PHRASE_LENGTH;
        if (mb_strlen($text) < $maxLen) {
            return [
                'result' => 'error',
                'message' => match ($lang) {
                    'ru' => 'Недостаточная длина поисковой фразы.',
                    'zh' => '搜索短语长度不足。',
                    default => 'Insufficient search phrase length.',
                },
            ];
        }

        if (mb_strlen($data['text']) > Config::MAX_SEARCH_PHRASE_LENGTH) {
            return [
                'result' => 'error',
                'message' => match ($lang) {
                    'ru' => 'Превышена длина поисковой фразы.',
                    'zh' => '已超出搜索短语的长度。',
                    default => 'The length of the search phrase has been exceeded.',
                },
            ];
        }


        if (!in_array($lang, Config::LANGS)) {
            return [
                'result' => 'error',
                'message' => 'This language type is not supported',
            ];
        }
        if (!in_array($version, Config::VERSIONS) ||
            !in_array($subversion, Config::SUBVERSIONS)
        ) {
            return [
                'result' => 'error',
                'message' => 'The specified version is not supported',
            ];
        }

        $result = Search::get($text, $lang, (int)$version, (int)$subversion, Config::MAX_SEARCH_RESULTS);
        if (!$result) {
            return [
                'result' => 'error',
                'message' => match ($lang) {
                    'ru' => 'Совпадений не найдено.',
                    'zh' => '未找到匹配项。',
                    default => 'No matches found.',
                },
            ];
        }

        return [
            'result' => 'ok',
            'data' => $result,
        ];
    }
}
