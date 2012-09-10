<?php

namespace MistyUtils;

class ExceptionFormatter
{
    private $exception;

    /**
     * @param Exception $exception The exception to analyze and format
     */
    public function __construct(\Exception $exception)
    {
        $this->exception = $exception;
    }

    /**
     * Format the exception and its stacktrace
     *
     * @return string The HTML-formatted exception
     */
    public function format()
    {
        return sprintf(
            '<div class="exception-info">
                <p class="exception-message">%s</p>
                <p class="exception-thrown-at">%s thrown in %s on line %s<p>
                <ul>
                    %s
                </ul>
            </div>',
            $this->exception->getMessage(),
            get_class($this->exception),
            $this->exception->getFile(),
            $this->exception->getLine(),
            '<li>' . implode('</li><li>', $this->getCallStack()) . '</li>'
        );
    }

    /**
     * Return an array with all the calls that happened before the Exception was thrown
     *
     * @return array of calls
     */
    public function getCallStack()
    {
        $stack = array();
        foreach ($this->exception->getTrace() as $call) {

            $context = isset($call['class']) ? $call['class'] . $call['type'] : 'function ';
            $function = $call['function'];

            $stack[] = sprintf(
                '%s%s() - %s on line %s',
                $context,
                $function,
                isset($call['file']) ? $call['file'] : '(unknwon)',
                isset($call['line']) ? $call['line'] : '(unknwon)'
            );
        }

        return $stack;
    }
}
