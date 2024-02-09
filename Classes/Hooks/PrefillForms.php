<?php

namespace Passionweb\FormPrefill\Hooks;

use TYPO3\CMS\Core\Context\Context;
use TYPO3\CMS\Core\Context\Exception\AspectNotFoundException;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Form\Domain\Model\Renderable\RenderableInterface;
use TYPO3\CMS\FrontendLogin\Domain\Repository\FrontendUserRepository;

class PrefillForms
{
    public function __construct(
        protected FrontendUserRepository $frontendUserRepository
    ) {
    }

    /**
     * @throws AspectNotFoundException
     */
    public function afterBuildingFinished(RenderableInterface $renderable): void
    {
        $formIdentifier = $renderable->getParentRenderable()->getIdentifier();
        $feUsername = GeneralUtility::makeInstance(Context::class)->getPropertyFromAspect('frontend.user', 'username');

        /**
         * verify that the form identifier matches the form to be pre-filled and the form is not submitted
         * add the form via a frontend plugin to get the following advantages:
         *      - a fixed form identifier (without trailing content element uid)
         *      - easier to check if the form is submitted or not
         */
        if(str_starts_with($formIdentifier, 'form-prefill') && empty($_POST['tx_form_formframework']) && !empty($feUsername)) {
            $formElements = $renderable->getElements();
            $frontendUser = $this->frontendUserRepository->findUserByUsernameOrEmailOnPages($feUsername);

            foreach($formElements as $element) {
                if ($element->getIdentifier() === 'firstname') {
                    $element->setDefaultValue($frontendUser['first_name'] ?? '');
                }
                if ($element->getIdentifier() === 'lastname') {
                    $element->setDefaultValue($frontendUser['last_name'] ?? '');
                }
                if ($element->getIdentifier() === 'email') {
                    $element->setDefaultValue($frontendUser['email'] ?? '');
                }
            }
        }
    }
}
