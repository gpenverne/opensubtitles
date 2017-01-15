<?php

namespace Gpenverne\OpenSubtitles\Service;

use Gpenverne\OpenSubtitlesBundle\DependencyInjection\OpenSubtitlesExtension;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class OpenSubtitlesBundle extends Bundle
{
    /**
     * @return OpenSubtitlesExtension
     */
    public function getContainerExtension()
    {
        return new OpenSubtitlesExtension();
    }
}
