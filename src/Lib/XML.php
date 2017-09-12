<?php
namespace Yurun\PaySDK\Lib;

class XML
{
	public static function fromString($string)
	{
		return (array)\simplexml_load_string($string, null, LIBXML_NOCDATA | LIBXML_COMPACT);
	}

	public static function toString($data)
	{
		$result = '<xml>';
		if(is_object($data))
		{
			$_data = ObjectToArray::parse($data);
		}
		else
		{
			$_data = &$data;
		}
		foreach($_data as $key => $value)
		{
			if(!\is_scalar($value))
			{
				if(\is_object($value) && \method_exists($value, 'toString'))
				{
					$value = $value->toString();
					if(null === $value)
					{
						continue;
					}
				}
				else if(null !== $value)
				{
					$value = \json_encode($value);
				}
				else
				{
					continue;
				}
			}
			$result .= "<{$key}><![CDATA[{$value}]]></{$key}>";
		}
		return $result . '</xml>';
	}
}