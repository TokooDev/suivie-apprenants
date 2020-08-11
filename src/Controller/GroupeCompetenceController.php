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
     * name="grpecompetences_referentiels",
     * path="/api/admin/referentiels/groupecompetences",
     * methods={"GET"},
     * defaults={
     * "_controller"="\app\Controller\GroupeCompetence::getGrpeCompetencesRefs",
     * "_api_resource_class"=GroupeCompetence::class,
     * "_api_collection_operation_name"="getgroupecompetence"
     * }
     * )
     */
    public function getGrpeCompetencesRefs(GroupeCompetenceRepository $repository)
    {
      $Gcompetences= $repository->getGrpeCompetencesRefs();

        return $this->json($Gcompetences,Response::HTTP_OK);
    }
}
