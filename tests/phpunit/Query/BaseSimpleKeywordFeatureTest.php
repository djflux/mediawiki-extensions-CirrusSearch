<?php

namespace CirrusSearch\Query;

use CirrusSearch\CrossSearchStrategy;
use CirrusSearch\CirrusTestCase;
use CirrusSearch\SearchConfig;

/**
 * Providers helper for writing tests of classes extending from
 * SimpleKeywordFeature
 */
abstract class BaseSimpleKeywordFeatureTest extends CirrusTestCase {

	/**
	 * @var KeywordFeatureAssertions
	 */
	private $kwAssertions;

	public function __construct( $name = null, array $data = [], $dataName = '' ) {
		parent::__construct( $name, $data, $dataName );
		$this->kwAssertions = new KeywordFeatureAssertions( $this );
	}

	/**
	 * @param KeywordFeature $feature
	 * @param array $expected
	 * @param string $term
	 */
	protected function assertWarnings( KeywordFeature $feature, $expected, $term ) {
		$this->kwAssertions->assertWarnings( $feature, $expected, $term );
	}

	/**
	 * Assert the value returned by KeywordFeature::getParsedValue
	 * @param KeywordFeature $feature
	 * @param string $term
	 * @param array|null $expected
	 * @param array|null $expectedWarnings (null to disable warnings check)
	 */
	protected function assertParsedValue( KeywordFeature $feature, $term, $expected, $expectedWarnings = null ) {
		$this->kwAssertions->assertParsedValue( $feature, $term, $expected, $expectedWarnings );
	}

	/**
	 * @param KeywordFeature $feature
	 * @param string $term
	 * @param array $expected
	 * @param array|null $expectedWarnings (null to disable warnings check)
	 * @param SearchConfig|null $config (if null will run with an empty SearchConfig)
	 */
	protected function assertExpandedData( KeywordFeature $feature, $term, array $expected, array $expectedWarnings = null, SearchConfig $config = null ) {
		$this->kwAssertions->assertExpandedData( $feature, $term, $expected, $expectedWarnings, $config );
	}

	/**
	 * @param KeywordFeature $feature
	 * @param string $term
	 * @param CrossSearchStrategy $expected
	 */
	protected function assertCrossSearchStrategy( KeywordFeature $feature, $term, CrossSearchStrategy $expected ) {
		$this->kwAssertions->assertCrossSearchStrategy( $feature, $term, $expected );
	}

	/**
	 * @param KeywordFeature $feature
	 * @param string $term
	 * @param array|callable|null $filter
	 * @param array|null $warnings
	 */
	protected function assertFilter( KeywordFeature $feature, $term, $filter = null, array $warnings = null ) {
		$this->kwAssertions->assertFilter( $feature, $term, $filter, $warnings );
	}

	/**
	 * @param KeywordFeature $feature
	 * @param string $term
	 */
	protected function assertNoResultsPossible( KeywordFeature $feature, $term ) {
		$this->kwAssertions->assertNoResultsPossible( $feature, $term );
	}

	/**
	 * @param KeywordFeature $feature
	 * @param string $term
	 * @param array|string|null $highlightField
	 * @param array|null $highlightField
	 */
	protected function assertHighlighting( KeywordFeature $feature, $term, $highlightField = null, array $higlightQuery = null ) {
		$this->kwAssertions->assertHighlighting( $feature, $term, $highlightField, $higlightQuery );
	}

	/**
	 * Historical test to make sure that the keyword does not consume unrelated values
	 * @param KeywordFeature $feature
	 * @param string $term
	 */
	protected function assertNotConsumed( KeywordFeature $feature, $term ) {
		$this->kwAssertions->assertNotConsumed( $feature, $term );
	}

	/**
	 * Historical test to make sure that the keyword does not consume unrelated values
	 * @param KeywordFeature $feature
	 * @param $term
	 * @param $remaining
	 */
	protected function assertRemaining( KeywordFeature $feature, $term, $remaining ) {
		$this->kwAssertions->assertRemaining( $feature, $term, $remaining );
	}
}
