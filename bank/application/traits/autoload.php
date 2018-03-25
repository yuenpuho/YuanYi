<?php
/**
 * 自动加载自定义的 trait 类
 * author: hu.yuanpu
 * Date: 2017/9/21
 * Time: 15:48
 */
namespace application\traits {
    if (!function_exists('traitAutoLoader')) {
        function traitAutoLoader($trait) {
            $file = $trait . '.php';

            $file = str_replace('\\', '/', $file);
            if (is_file($file) && !trait_exists($trait)) {
                require_once $file;
            }
        }
    }

    spl_autoload_register(__NAMESPACE__ . '\traitAutoLoader');
}