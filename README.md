# opensubtitles
This repo provides a service for symfony3 to handle the kminek/open-subtitles client

## Config/Parameters
Set your parameters.yml with your custom credentials:
```
parameters:
    opensubtitles.username: ~
    opensubtitles.password: ~
    opensubtitles.user_agent: OSTestUserAgentTemp
```

Load the bundle from your AppKernel.php file:
```
$bundles = [
    new Gpenverne\OpenSubtitlesBundle(),
    ...,
];
```

## Use it
```
    $this->container->get('opensubtitles_api')->getSubtitles('A movie title');
    $this->container->get('opensubtitles_api')->getSubtitles(1234); // Search from imdbid
    $client = $this->container->get('opensubtitles_api')->getClient(); // Return the kminek/open-subtitles client
```
