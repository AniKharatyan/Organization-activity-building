<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Dtos\Organizations\GetByRadiusDto;
use App\Actions\Organization\GetByIdAction;
use App\Requests\Organizations\GetByIdRequest;
use App\Actions\Organization\GetByRadiusAction;
use App\Actions\Organization\SearchByNameAction;
use App\Requests\Organizations\GetByRadiusRequest;
use App\Requests\Organizations\SearchByNameRequest;
use App\Actions\Organization\GetByActivityIdAction;
use App\Actions\Organization\GetByBuildingIdAction;
use App\Actions\Organization\GetByActivityTreeAction;
use App\Requests\Organizations\GetByActivityIdRequest;
use App\Requests\Organizations\GetByBuildingIdRequest;
use App\Requests\Organizations\GetByActivityTreeRequest;

/**
 * @OA\Tag(name="Organizations")
 */
class OrganizationController extends Controller
{
    public function __construct(
        public GetByIdAction $getByIdAction,
        public GetByRadiusAction $getByRadiusAction,
        public SearchByNameAction $searchByNameAction,
        public GetByBuildingIdAction $getByBuildingIdAction,
        public GetByActivityIdAction $getByActivityIdAction,
        public GetByActivityTreeAction $getByActivityTreeAction
    ) {}


    /**
     * @OA\Get(
     *     path="/api/organizations/building/{buildingId}",
     *     tags={"Organizations"},
     *     summary="Get organizations by building ID",
     *     @OA\Parameter(
     *         name="buildingId",
     *         in="path",
     *         required=true,
     *         description="ID of the building",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of organizations"
     *     )
     * )
     */
    public function getByBuildingId(GetByBuildingIdRequest $request): JsonResponse
    {
        $organizations = $this->getByBuildingIdAction->execute($request->getBuildingId());

        return response()->json(['organizations' => $organizations]);
    }

    /**
     * @OA\Get(
     *     path="/api/organizations/activity/{activityId}",
     *     tags={"Organizations"},
     *     summary="Get organizations by activity ID",
     *     @OA\Parameter(
     *         name="activityId",
     *         in="path",
     *         required=true,
     *         description="ID of the activity",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of organizations"
     *     )
     * )
     */
    public function getByActivityId(GetByActivityIdRequest $request): JsonResponse
    {
        $organizations = $this->getByActivityIdAction->execute($request->getActivityId());

        return response()->json(['organizations' => $organizations]);
    }

    /**
     * @OA\Get(
     *     path="/api/organizations/radius",
     *     tags={"Organizations"},
     *     summary="Get organizations within a radius",
     *     @OA\Parameter(
     *         name="latitude",
     *         in="query",
     *         required=true,
     *         @OA\Schema(type="number", format="float")
     *     ),
     *     @OA\Parameter(
     *         name="longitude",
     *         in="query",
     *         required=true,
     *         @OA\Schema(type="number", format="float")
     *     ),
     *     @OA\Parameter(
     *         name="radius",
     *         in="query",
     *         required=true,
     *         @OA\Schema(type="number", format="float")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of organizations within the radius"
     *     )
     * )
     */
    public function getByRadius(GetByRadiusRequest $request): JsonResponse
    {
        $dto = GetByRadiusDto::fromRequest($request);

        $organizations = $this->getByRadiusAction->execute($dto);

        return response()->json(['organizations' => $organizations]);
    }

    /**
     * @OA\Get(
     *     path="/api/organizations/{id}",
     *     tags={"Organizations"},
     *     summary="Get organization by ID",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Organization details"
     *     )
     * )
     */
    public function getById(GetByIdRequest $request): JsonResponse
    {
        $organization = $this->getByIdAction->execute($request->getId());

        return response()->json(['organization' => $organization]);
    }

    /**
     * @OA\Get(
     *     path="/api/organizations/search",
     *     tags={"Organizations"},
     *     summary="Search organizations by name",
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of organizations"
     *     )
     * )
     */
    public function searchByName(SearchByNameRequest $request): JsonResponse
    {
        $organizations = $this->searchByNameAction->execute($request->getName());

        return response()->json(['organizations' => $organizations]);
    }

    /**
     * @OA\Get(
     *     path="/api/organizations/activity/tree/{activityId}",
     *     tags={"Organizations"},
     *     summary="Get organizations by activity tree",
     *     @OA\Parameter(
     *         name="activityId",
     *         in="path",
     *         required=true,
     *         description="ID of the activity tree",
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="List of organizations"
     *     )
     * )
     */
    public function getByActivityTree(GetByActivityTreeRequest $request): JsonResponse
    {
        $organizations = $this->getByActivityTreeAction->execute($request->getActivityId());

        return response()->json(['organizations' => $organizations]);
    }
}
