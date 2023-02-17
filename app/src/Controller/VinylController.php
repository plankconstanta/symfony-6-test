<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;
use function Symfony\Component\String\u;

use App\Service\MixRepository;

class VinylController extends AbstractController
{
    public function __construct(
        private bool $isDebug,
        private MixRepository $mixRepository
    )
    {}

    #[Route('/', name: 'app_homepage')]
    public function homepage(Environment $twig): Response
    {
        $tracks = [
            ['song' => 'Gangsta\'s Paradise', 'artist' => 'Coolio'],
            ['song' => 'Waterfalls', 'artist' => 'TLC'],
            ['song' => 'Creep', 'artist' => 'Radiohead'],
            ['song' => 'Kiss from a Rose', 'artist' => 'Seal'],
            ['song' => 'On Bended Knee', 'artist' => 'Boyz II Men'],
            ['song' => 'Fantasy', 'artist' => 'Mariah Carey'],
        ];
        //dump($tracks);
        /*return $this->render('vinyl/homepage.html.twig', [
            'title' => 'PB & Jams',
            'tracks' => $tracks,
        ]);*/
        $html = $twig->render('vinyl/homepage.html.twig', [
            'title' => 'PB & Jams',
            'tracks' => $tracks,
        ]);
        //dd($html);
        return new Response($html);
    }

    #[Route('/browse/{slug}', name: 'app_browse')]
    public function browse(string $slug = null): Response
    {
        //dd($this->getParameter('kernel.project_dir'));
        dump($this->isDebug);
        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;

        $mixes = $this->mixRepository->findAll();

        return $this->render('vinyl/browse.html.twig', [
            'genre' => $genre,
            'mixes' => $mixes,
        ]);
    }

}
