<?php
namespace Djgg\UserBundle;
use FOS\UserBundle\FOSUserBundle;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class DjggUserBundle extends Bundle
{
	public function getParent() {
		return 'FOSUserBundle';
	}
}
