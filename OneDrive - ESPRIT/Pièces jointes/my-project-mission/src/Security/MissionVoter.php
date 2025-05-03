// src/Security/MissionVoter.php
namespace App\Security;

use App\Entity\Mission;
use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class MissionVoter extends Voter
{
    const VIEW = 'view';
    const EDIT = 'edit';
    const DELETE = 'delete';

    protected function supports(string $attribute, $subject): bool
    {
        return in_array($attribute, [self::VIEW, self::EDIT, self::DELETE])
            && $subject instanceof Mission;
    }

    protected function voteOnAttribute(string $attribute, $subject, TokenInterface $token): bool
    {
        $user = $token->getUser();
        
        if (!$user instanceof User) {
            return false;
        }

        /** @var Mission $mission */
        $mission = $subject;

        switch ($attribute) {
            case self::VIEW:
                return $this->canView($mission, $user);
            case self::EDIT:
            case self::DELETE:
                return $this->canEdit($mission, $user);
        }

        throw new \LogicException('This code should not be reached!');
    }

    private function canView(Mission $mission, User $user): bool
    {
        if ($this->canEdit($mission, $user)) {
            return true;
        }

        return $mission->isPublished() && $user->isFreelancer();
    }

    private function canEdit(Mission $mission, User $user): bool
    {
        return $user === $mission->getUser() && $user->isEmployeur();
    }
}