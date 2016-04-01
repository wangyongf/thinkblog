<?php

/* vim: set shiftwidth=2 expandtab softtabstop=2: */

namespace Boris;

/**
 * Config handles loading configuration files for boris
 */
class Config
{
    private $_searchPaths;
    private $_cascade = FALSE;
    private $_files = array();

    /**
     * Create a new Config instance, optionally with an array
     * of paths to search for configuration files.
     *
     * Additionally, if the second, optional boolean argument is
     * true, all existing configuration files will be loaded, and
     * effectively merged.
     *
     * @param array $searchPaths
     * @param bool $cascade
     */
    public function __construct($searchPaths = null, $cascade = FALSE)
    {
        if (is_null($searchPaths))
        {
            $searchPaths = array();

            if ($userHome = getenv('HOME'))
            {
                $searchPaths[] = "{$userHome}/.borisrc";
            }

            $searchPaths[] = getcwd() . '/.borisrc';
        }

        $this->_cascade = $cascade;
        $this->_searchPaths = $searchPaths;
    }

    /**
     * Searches for configuration files in the available
     * search paths, and applies them to the provided
     * boris instance.
     *
     * Returns true if any configuration files were found.
     *
     * @param  Boris\Boris $boris
     *
     * @return bool
     */
    public function apply(Boris $boris)
    {
        $applied = FALSE;

        foreach ($this->_searchPaths as $path)
        {
            if (is_readable($path))
            {
                $this->_loadInIsolation($path, $boris);

                $applied = TRUE;
                $this->_files[] = $path;

                if (! $this->_cascade)
                {
                    break;
                }
            }
        }

        return $applied;
    }

    private function _loadInIsolation($path, $boris)
    {
        require $path;
    }

    // -- Private Methods

    /**
     * Returns an array of files that were loaded
     * for this Config
     *
     * @return array
     */
    public function loadedFiles()
    {
        return $this->_files;
    }
}
