<?php
namespace Confl1kt\NewsBundle\Controller;

use Sonata\AdminBundle\Controller\CRUDController;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;

class CommentAdminController extends CRUDController
{
    /**
     * @param \Sonata\AdminBundle\Datagrid\ProxyQueryInterface $query
     * @param                                                  $status
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @throws \Symfony\Component\Security\Core\Exception\AccessDeniedException
     */
    protected function commentChangeStatus(ProxyQueryInterface $query, $status)
    {
        if (false === $this->admin->isGranted('EDIT')) {
            throw new AccessDeniedException();
        }

        foreach ($query->execute() as $comment) {
            $comment->setStatus($status);

            $this->admin->getModelManager()->update($comment);
        }

        return new RedirectResponse($this->admin->generateUrl('list', $this->admin->getFilterParameters()));
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\ProxyQueryInterface $query
     *
     * @return RedirectResponse
     */
    public function batchActionEnabled(ProxyQueryInterface $query)
    {
        return $this->commentChangeStatus($query, true);
    }

    /**
     * @param \Sonata\AdminBundle\Datagrid\ProxyQueryInterface $query
     *
     * @return RedirectResponse
     */
    public function batchActionDisabled(ProxyQueryInterface $query)
    {
        return $this->commentChangeStatus($query, false);
    }
}
