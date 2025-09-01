<?php
/**
 * Database connection for Simple Registration Website
 */

class database
{
    public static $auth;
    public static $chars;

    public static function db_connect()
    {
        try {
            self::$auth = new PDO(
                'mysql:host=' . get_config('db_auth_host') . 
                ';port=' . get_config('db_auth_port') . 
                ';dbname=' . get_config('db_auth_dbname') . 
                ';charset=utf8',
                get_config('db_auth_user'),
                get_config('db_auth_pass'),
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }

        // Connect to character databases if configured
        $realmlists = get_config("realmlists");
        if (is_iterable($realmlists)) {
            foreach ($realmlists as $realm) {
                if (!empty($realm["realmid"]) && !empty($realm["db_host"]) && !empty($realm["db_port"]) && !empty($realm["db_user"]) && !empty($realm["db_pass"]) && !empty($realm["db_name"])) {
                    try {
                        self::$chars[$realm["realmid"]] = new PDO(
                            'mysql:host=' . $realm["db_host"] . 
                            ';port=' . $realm["db_port"] . 
                            ';dbname=' . $realm["db_name"] . 
                            ';charset=utf8',
                            $realm["db_user"],
                            $realm["db_pass"],
                            [
                                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                                PDO::ATTR_EMULATE_PREPARES => false
                            ]
                        );
                    } catch (PDOException $e) {
                        die("Character database connection failed for realm " . $realm["realmid"] . ": " . $e->getMessage());
                    }
                }
            }
        }
    }
}
