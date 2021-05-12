<?php

declare(strict_types=1);

namespace MeiliSearch\Bundle\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class MeiliSearchClearCommand.
 */
final class MeiliSearchClearCommand extends IndexCommand
{
    protected static $defaultName = 'meili:clear';

    protected function configure()
    {
        $this
            ->setDescription('Clear the index documents')
            ->addOption('indices', 'i', InputOption::VALUE_OPTIONAL, 'Comma-separated list of index names');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $indexToClear = $this->getEntitiesFromArgs($input, $output);

        foreach ($indexToClear as $indexName => $entity) {
            $className = $entity['name'];
            $array = $this->searchService->clear($className);
            if ('failed' === $array['status']) {
                $output->writeln('<error>Index <info>'.$indexName.'</info>  couldn\'t be cleared</error>');
            } else {
                $output->writeln(
                    'Cleared <info>'.$indexName.'</info> index of <comment>'.$className.'</comment> '
                );
            }
        }

        $output->writeln('<info>Done!</info>');

        return 0;
    }
}
