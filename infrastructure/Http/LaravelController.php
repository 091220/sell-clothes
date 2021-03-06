<?php 

namespace Infrastructure\Http;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Routing\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Router;
use InvalidArgumentException;
use Illuminate\Http\Request;
use JsonSerializable;

abstract class LaravelController extends Controller
{
    /**
     * Defaults
     * @var array
     */
    protected $defaults = [];

    /**
     * Create a json response
     * @param  mixed  $data
     * @param  integer $statusCode
     * @param  array  $headers
     * @return Illuminate\Http\JsonResponse
     */
    protected function response($data, $statusCode = 200, array $headers = [])
    {
        if ($data instanceof Arrayable && !$data instanceof JsonSerializable) {
            $data = $data->toArray();
        }

        return new JsonResponse($data, $statusCode, $headers);
    }

    /**
     * Page sort
     * @param array $sort
     * @return array
     */
    protected function parseSort(array $sort) {
        return array_map(function($sort) {
            if (!isset($sort['direction'])) {
                $sort['direction'] = 'asc';
            }

            return $sort;
        }, $sort);
    }

    /**
     * Parse include strings into resource and modes
     * @param  array  $includes
     * @return array The parsed resources and their respective modes
     */
    protected function parseIncludes(array $includes)
    {
        $return = [
            'includes' => [],
            'modes' => []
        ];

        foreach ($includes as $include) {
            $explode = explode(':', $include);

            if (!isset($explode[1])) {
                $explode[1] = $this->defaults['mode'];
            }

            $return['includes'][] = $explode[0];
            $return['modes'][$explode[0]] = $explode[1];
        }

        return $return;
    }

    /**
     * Parse filter group strings into filters
     * Filters are formatted as key:operator(value)
     * Example: name:eq(esben)
     * @param  array  $filter_groups
     * @return array
     */
    protected function parseFilterGroups(array $filter_groups)
    {
        $return = [];

        foreach($filter_groups as $group) {
            if (!array_key_exists('filters', $group)) {
                throw new InvalidArgumentException('Filter group does not have the \'filters\' key.');
            }

            $filters = array_map(function($filter){
                if (!isset($filter['not'])) {
                    $filter['not'] = false;
                }

                return $filter;
            }, $group['filters']);

            $return[] = [
                'filters' => $filters,
                'or' => isset($group['or']) ? $group['or'] : false
            ];
        }

        return $return;
    }

    /**
     * Parse GET parameters into resource options
     * @return array
     */
    protected function parseResourceOptions($request = null)
    {
        if ($request === null) {
            $request = request();
        }

        $this->defaults = array_merge([
            'includes' => [],
            'sort' => [],
            'fields' => '',
            'limit' => null,
            'page' => null,
            'mode' => 'embed',
            'filter_groups' => [],
            'options' => [],
            'skip' => null,
            'take' => null,
			'not_fields' => null,
			'filter_or' => []
        ], $this->defaults);

        $includes = $this->parseIncludes($request->get('includes', $this->defaults['includes']));
        $sort = $this->parseSort($request->get('sort', $this->defaults['sort']));
        $fields = $request->get('fields', '');
        $limit = $request->get('limit', $this->defaults['limit']);
        $page = $request->get('page', $this->defaults['page']);
        $filter_groups = $this->parseFilterGroups($request->get('filter_groups', $this->defaults['filter_groups']));
        $options = $request->get('options', $this->defaults['options']);
        $skip = $request->get('skip', $this->defaults['skip']);
        $take = $request->get('take', $this->defaults['take']);
		$not_fields = $request->get('not_fields', $this->defaults['not_fields']);
		$filter_or  = $request->get('filter_or', $this->defaults['filter_or']);
		
        if ($page !== null && $limit === null) {
            throw new InvalidArgumentException('Cannot use page option without limit option');
        }

        return [
            'includes' 		=> $includes['includes'],
            'modes' 		=> $includes['modes'],
            'sort' 			=> $sort,
            'fields' 		=> $fields,
            'limit' 		=> $limit,
            'page' 			=> $page,
            'filter_groups' => $filter_groups,
            'options' 	 	=> $options,
            'skip'       	=> $skip,
            'take'       	=> $take,
			'not_fields' 	=> $not_fields,
			'filter_or'  	=> $filter_or
        ];
    }
}