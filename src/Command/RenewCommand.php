<?php

namespace Tenolo\Bundle\TranslationBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Tenolo\Bundle\TranslationBundle\Service\TranslationServiceInterface;

/**
 * Class RenewCommand
 *
 * @package Tenolo\Bundle\TranslationBundle\Command
 * @author  Nikita Loges
 */
class RenewCommand extends Command
{

    /** @var TranslationServiceInterface */
    protected $translationService;

    /**
     * @param TranslationServiceInterface $translationService
     */
    public function __construct(TranslationServiceInterface $translationService)
    {
        parent::__construct();

        $this->translationService = $translationService;
    }

    /**
     * @inheritDoc
     */
    protected function configure()
    {
        $this->setName('tenolo:translation:renew');
    }

    /**
     * @inheritDoc
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->translationService->clearLanguageCache();
    }

}
