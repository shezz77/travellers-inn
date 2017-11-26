<?php
/**
 * Created by PhpStorm.
 * User: Shehz
 * Date: 26-Nov-17
 * Time: 7:58 PM
 */

namespace App\Services;


use App\Repositories\Contracts\IHashTagRepo;
use App\Services\Contracts\IHashTagService;

class HashTagService extends BaseService implements IHashTagService
{

    /**
     * HashTagService constructor.
     * @param IHashTagRepo $hashTagRepo
     */
    public function __construct(IHashTagRepo $hashTagRepo)
    {
        parent::__construct($hashTagRepo);
    }

    public function fetchHashTags(array $params = [])
    {
        return $this->repository->fetchHashTags($params);
    }

    public function createNewTags(array $params = [])
    {
        return $this->repository->createNewTags($params);
    }

    public function fetchPostsByHashTagId(array $params = [])
    {
        return $this->repository->fetchPostsByHashTagId($params);
    }
}