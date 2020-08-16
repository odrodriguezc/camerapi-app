<?php

namespace App\Controller;

use App\Form\PhotoType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class PhotoController extends AbstractController
{
    /**
     * @Route("/photo", name="photo_index")
     */
    public function index()
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PhotoController.php',
        ]);
    }

    /**
     * @Route ("/photo/capture", name="photo_capture")
     * @param EntityManagerInterface $em
     * @param Request $request
     * @param Filesystem $filesystem
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function capture(EntityManagerInterface  $em, Request $request, Filesystem $filesystem){
        $form = $this->createForm(PhotoType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $photo = $form->getData();
            $photo
                ->setPath('documents')
                ->setFileName($photo->getLabel(). uniqid())
                ->setExtention('jpg')
                ->setSize('2000');

            $em->persist($photo);
            $em->flush();

            //Write python script with form values
            $py_script = "#!/usr/bin/env python

print('Hello World.')
print('{$photo->getAWB()}')

            ";

            try {

               $filesystem->dumpFile('camera.py', $py_script);

            } catch (IOExceptionInterface $exception){
                dd($exception);
            }
            //execute script
            $command = escapeshellcmd('python C:\Users\odrod\Documents\projects\picamera\public\camera.py');
            $output = shell_exec($command);

            return $this->redirectToRoute("photo_index", [
                'output' => $output
            ]);
        }

        return $this->render('photo/capture.html.twig', [
            'photoForm' => $form->createView()
        ]);
    }
}
