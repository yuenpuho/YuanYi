<?php
namespace application\traits;
/**
 * Trait Adsorber
 * @package Application\Traits
 */
trait Adsorber {
    /**
     * 对一对多关系的数据进行处理，返回三维数组
     * @param array $data
     * @param string $masterKey
     * @param array $masterFields
     * @param string $dependencyKey
     * @param array $dependencyFields
     * @return array
     */
    public function adsorb($data = array(), $masterKey = '', $masterFields = array(), $dependencyKey = '', $dependencyFields = array()) {
        $temp = array();

        foreach ($data as $item) {
            foreach ($masterFields as $mf) {
                $temp[$item[$masterKey]][$mf] = $item[$mf];
            }

            if (isset($item[$dependencyKey])) {
                $temp[$item[$masterKey]][$dependencyKey] = $this->detach($item[$dependencyKey], $dependencyFields);
            }
        }

        unset($data);

        return $temp;
    }

    private function detach($element, $fields) {
        $temp = array();
        $dependencies = explode(',', $element);

        foreach ($dependencies as $val) {
            $debris = explode(':', $val);

            foreach ($fields as $index => $f) {
                $single[$f] = $debris[$index];
            }

            $temp[] = $single;
        }

        return $temp;
    }
}