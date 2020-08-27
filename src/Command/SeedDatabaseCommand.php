<?php 

namespace App\Command;

use App\Entity\User;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManagerInterface;



class SeedDatabaseCommand extends Command{

    protected static $defaultName = 'app:seed-database';

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        parent::__construct();
    }

    protected function configure(){}

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $output->writeln([
            '============',
            'Adding users',
            '============'
        ]);

        $repo = $this->entityManager->getRepository(User::class);

        $users = [
            ["name" => "Guest", "password" => "supersecret"],
            ["name" => "AnotherUser", "password" => "supersecret"]
        ];

        foreach($users as $user){
            $toPersist = new User();
            $toPersist->setName($user["name"]);
            $toPersist->setPassword($user["password"]);
            $repo->persist($toPersist);
        }

        $repo->flush();

        return Command::SUCCESS;
    }
}


?>