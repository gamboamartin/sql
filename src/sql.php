<?php
namespace gamboamartin\src;



use gamboamartin\errores\errores;

class sql{

    private errores $error;

    public function __construct()
    {
        $this->error = new errores();

    }

    /**
     * POR DOCUMENTAR EN WIKI FINAL REV
     * Función para validar los valores de entrada `llave` y `values_sql`
     *
     * @param string $llave      Nombre de la llave. Debe ser una cadena de texto no vacía si `values_sql` no está vacía.
     * @param string $values_sql Valor SQL para la llave. Debe ser una cadena de texto no vacía si `llave` no está vacía.
     *
     * @return bool|array Retorna verdadero si la validación fue exitosa.
     *                    En caso de error, retorna un array con información de error proporcionada por la función `error`.
     *
     * @final Esta función no puede ser sobrescrita en una clase hija.
     * @version 16.265.1
     */
    final public function valida_in(string $llave, string $values_sql): bool|array
    {
        $llave = trim($llave);
        $values_sql = trim($values_sql);
        if($llave !== ''){
            if($values_sql ===''){
                return $this->error->error(mensaje: 'Error si llave tiene info values debe tener info',
                    data: $llave, es_final: true);
            }
        }

        if($values_sql !== ''){
            if($llave ===''){
                return $this->error->error(
                    mensaje: 'Error si values_sql tiene info llave debe tener info', data: $values_sql, es_final: true);
            }
        }
        return true;
    }


}

