<?php
/**
 * Reactoor\illustrate\Exeptions - php errors for cool kids
 * @author Arshiamohammadei <arshia8587@gmail.com>
 */
namespace illustrate\Exeptions\Util;

/**
 * Used as output callable for Symfony\Component\VarDumper\Dumper\HtmlDumper::dump()
 *
 * @see TemplateHelper::dump()
 */
class HtmlDumperOutput
{
    private $output;

    public function __invoke($line, $depth)
    {
        // A negative depth means "end of dump"
        if ($depth >= 0) {
            // Adds a two spaces indentation to the line
            $this->output .= str_repeat('  ', $depth) . $line . "\n";
        }
    }

    public function getOutput()
    {
        return $this->output;
    }

    public function clear()
    {
        $this->output = null;
    }
}
