<?php

namespace App\Controller;

use App\Data\QuotaRequest;
use App\DataSource\QuotaRequestDataSourceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class QuotaRequestsController extends AbstractController
{
    #[Route('/quota-requests', name: 'admin_quota_requests_list')]
    public function __invoke(QuotaRequestDataSourceInterface $quotaRequestRepository): Response
    {
        $quotas = $quotaRequestRepository->findAll();
        $quotasFromMike = array_filter(
            $quotas,
            static fn(QuotaRequest $request): bool => $request->username === 'mike',
        );

        return $this->render('admin/quota-requests/quota-requests.html.twig', [
            'quotas' => $quotas,
            'mikes_quotas' => $quotasFromMike,
        ]);
    }
}
