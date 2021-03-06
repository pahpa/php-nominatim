<?php
/**
 * Class Lookup
 *
 * @package      maxh\nominatim
 * @author       Maxime Hélias <maximehelias16@gmail.com>
 */

namespace maxh\Nominatim;

use maxh\Nominatim\Exceptions\InvalidParameterException;

/**
 * Lookup the address of one or multiple OSM objects like node, way or relation.
 *
 * @see http://wiki.openstreetmap.org/wiki/Nominatim
 */
class Lookup extends Query
{

    /**
     * Constuctor
     * @param array $query Default value for this query
     */
    public function __construct(array $query = [])
    {
        parent::__construct();

        $this->setPath('lookup');
    }

    // -- Builder methods ------------------------------------------------------

    /**
     * A list of up to 50 specific osm node, way or relations ids to return the addresses for
     *
     * @param  string $id
     *
     * @return maxh\Nominatim\Lookup
     */
    public function osmIds($id)
    {
        $this->query['osm_ids'] = $id;

        return $this;
    }

    /**
     * Output format for the geometry of results
     *
     * @param  string $polygon
     *
     * @throws maxh\Nominatim\Exceptions\InvalidParameterException  Polygon is not supported with lookup
     */
    public function polygon($polygon)
    {
        throw new InvalidParameterException("The polygon is not supported with lookup");
    }
}
