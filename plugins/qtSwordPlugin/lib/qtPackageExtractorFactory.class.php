<?php

/*
 * This file is part of the AccesstoMemory (AtoM) software.
 *
 * AccesstoMemory (AtoM) is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * AccesstoMemory (AtoM) is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with AccesstoMemory (AtoM).  If not, see <http://www.gnu.org/licenses/>.
 */

class qtPackageExtractorFactory
{
  public static function build($format, array $options = array())
  {
    preg_match_all('/^.*\/(.*)\/*$/', $format, $matches);

    if (isset($matches[1]))
    {
      $className = 'qtPackageExtractor'.$matches[1][0];

      if (!class_exists($className))
      {
        throw new Exception('Package format not supported.');
      }
    }
    else
    {
      throw new Exception('Package format not recognized.');
    }

    return new $className($options + array('format' => $format));
  }
}
