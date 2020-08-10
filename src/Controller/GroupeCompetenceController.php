<?php

namespace App\Controller;

use App\Entity\GroupeCompetence;
use App\Repository\GroupeCompetenceRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GroupeCompetenceController extends AbstractController
{
    /**
 * @Route(
 * name="groupeCompetence_liste",
 * path="api/admin/groupeCompetences",
 * methods={"GET"},
 * defaults={
 * "_controller"="\app\ControllerApprenantController::showGroupeCompetences",
 * "_api_resource_class"=GroupeCompetence::class,
 * "_api_collection_operation_name"="show_GroupeCompetences"
 * }
 * )
 */
    public function showGroupeCompetences(GroupeCompetenceRepository $GroupeCompetence)
    {
        $GroupeCompetence = $GroupeCompetence->findALL();
        //dd($GroupeCompetence[0]->getUser());
        return $this->json($GroupeCompetence,Response::HTTP_OK);
    }
}
