<?php
/**
 * Class Minify_ServeConfiguration
 */

/**
 * A configuration for Minify::serve() determined by a controller
 */
class Minify_ServeConfiguration
{
    /**
     * @var Minify_SourceInterface[]
     */
    protected $sources;

    /**
     * @var array
     */
    protected $options;

    /**
     * @var string
     */
    protected $selectionId = '';

    /**
     * @param array                    $options
     * @param Minify_SourceInterface[] $sources
     * @param string                   $selectionId
     */
    public function __construct(array $options, array $sources = array(), $selectionId = '')
    {
        $this->options = $options;
        $this->sources = $sources;
        $this->selectionId = $selectionId;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Short name to place inside cache id
     *
     * The setupSources() method may choose to set this, making it easier to
     * recognize a particular set of sources/settings in the cache folder. It
     * will be filtered and truncated to make the final cache id <= 250 bytes.
     *
     * @return string
     */
    public function getSelectionId()
    {
        return $this->selectionId;
    }

    /**
     * @return Minify_SourceInterface[]
     */
    public function getSources()
    {
        return $this->sources;
    }
}
