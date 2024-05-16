<?php

use gamboamartin\errores\errores;
use gamboamartin\src\sql;
use gamboamartin\test\test;


class sqlTest extends test {
    public errores $errores;
    public function __construct(?string $name = null)
    {
        parent::__construct($name);
        $this->errores = new errores();
    }

    public function test_valida_in(): void
    {
        errores::$error = false;
        $sql = new sql();
        //$sql = new liberator($sql);

        $llave = '';
        $values_sql = '';
        $resultado = $sql->valida_in($llave, $values_sql);
        $this->assertIsBool( $resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertTrue($resultado);

        errores::$error = false;

        $llave = 'a';
        $values_sql = '';
        $resultado = $sql->valida_in($llave, $values_sql);
        $this->assertIsArray( $resultado);
        $this->assertTrue(errores::$error);
        $this->assertStringContainsStringIgnoringCase('Error si llave tiene info values debe tener info',$resultado['mensaje']);

        errores::$error = false;

        $llave = 'a';
        $values_sql = 'b';
        $resultado = $sql->valida_in($llave, $values_sql);
        $this->assertIsBool( $resultado);
        $this->assertNotTrue(errores::$error);
        $this->assertTrue($resultado);

        errores::$error = false;

        $llave = '';
        $values_sql = 'b';
        $resultado = $sql->valida_in($llave, $values_sql);
        $this->assertIsArray( $resultado);
        $this->assertTrue(errores::$error);
        $this->assertStringContainsStringIgnoringCase('Error si values_sql tiene info llave debe tener info',$resultado['mensaje']);
        errores::$error = false;

    }






}